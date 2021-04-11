/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package services;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.Date;
import java.util.EnumSet;
import java.util.GregorianCalendar;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;
import java.util.concurrent.TimeUnit;
import models.cellule;
import models.reservation;
import utils.DataSource;


/**
 *
 * @author Administrateur
 */
public class ServiceReservation implements IService<reservation>{
       Connection cnx = DataSource.getInstance().getCnx();

    @Override
    public void ajouter(reservation t) {
         try {
            String requete = "INSERT INTO reservation (dateD,dateF,matricule,idCell) VALUES (?,?,?,?)";
            PreparedStatement pst = cnx.prepareStatement(requete);
            pst.setDate(1, t.getDateD());
            pst.setDate(2, t.getDateF());
            pst.setString(3, t.getMatricule());
            pst.setString(4, t.getIdCell());
            pst.executeUpdate();
            System.out.println("Reservation ajoutée !");

        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }   
        
    }

    @Override
    public void supprimer(reservation t) {
         try {
            String requete = "DELETE FROM reservation WHERE idReservation=?";
            PreparedStatement pst = cnx.prepareStatement(requete);
            pst.setInt(1, t.getIdReservation());
            pst.executeUpdate();
            System.out.println("reservation supprimée !");

        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
    }
    
  

    @Override
    public List<reservation> afficher() {
         List<reservation> list = new ArrayList<>();

        try {
            String requete = "SELECT * FROM reservation";
            PreparedStatement pst = cnx.prepareStatement(requete);
            ResultSet rs = pst.executeQuery();
            while (rs.next()) {
                list.add(new reservation(rs.getInt("idReservation"), rs.getDate("dateD"), rs.getDate("dateF"),rs.getString("matricule"), rs.getString("idCell")));
            }

        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }

        return list;
    }
    
    public List<reservation> rechercherParDate(String date1) throws SQLException {
        List<reservation> list = new ArrayList<>();

        try {

            String requete = "SELECT * FROM reservation where dateD ='" + date1 + "'";

            Statement pst = cnx.createStatement();
            ResultSet rs = pst.executeQuery(requete);
            while (rs.next()) {
                list.add(new reservation(rs.getInt("idReservation"), rs.getDate("dateD"), rs.getDate("dateF"), rs.getString("matricule") , rs.getString("idCell")));
            }
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
        return list;

    }
    
  public static Map<TimeUnit,Long> Diff(String dated, String datef) {
      
    LocalDate date1 = LocalDate.parse(dated, DateTimeFormatter.ISO_DATE);
    LocalDate date2 = LocalDate.parse(datef, DateTimeFormatter.ISO_DATE);
    long diffInMillies = date2.getTime() - date1.getTime();
    List<TimeUnit> units = new ArrayList<>(EnumSet.allOf(TimeUnit.class));
    Collections.reverse(units);
    Map<TimeUnit,Long> result = new LinkedHashMap<>();
    long milliesRest = diffInMillies;
    for ( TimeUnit unit : units ) {
        long diff = unit.convert(milliesRest,TimeUnit.MILLISECONDS);
        long diffInMilliesForUnit = unit.toMillis(diff);
        milliesRest = milliesRest - diffInMilliesForUnit;
        result.put(unit,diff);
    }
    return result;
}
    
      public List<reservation> trie() {
         List<reservation> list = new ArrayList<>();

        try {
            String requete = "SELECT * FROM reservation order by dateD desc";
            PreparedStatement pst = cnx.prepareStatement(requete);
            ResultSet rs = pst.executeQuery();
            while (rs.next()) {
                list.add(new reservation(rs.getInt("idReservation"), rs.getDate("dateD"), rs.getDate("dateF"),rs.getString("matricule"), rs.getString("idCell")));
            }

        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }

        return list;
    }

   

   

    
}
