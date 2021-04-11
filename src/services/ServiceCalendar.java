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
import java.util.ArrayList;
import java.util.List;
import models.calendar;
import models.cellule;
import utils.DataSource;

/**
 *
 * @author Administrateur
 */
public class ServiceCalendar implements IService<calendar> {
 Connection cnx = DataSource.getInstance().getCnx();
    @Override
    public void ajouter(calendar t) {
 try {
            String requete = "INSERT INTO calendar (id,title,start,end,description,background_color,text_color,border_color) VALUES (?,?,?,?,?,?,?,?)";
            PreparedStatement pst = cnx.prepareStatement(requete);
            pst.setInt(1, t.getId());
            pst.setString(2, t.getTitle());
            pst.setDate(3, t.getStart());
            pst.setDate(4, t.getEnd());
            pst.setString(5, t.getDescription());
            pst.setString(6, t.getBackground_color());
            pst.setString(7, t.getText_color());
            pst.setString(8, t.getBorder_color());
            pst.executeUpdate();
            System.out.println("rendez-vous ajouté !");

        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }       }

    @Override
    public void supprimer(calendar t) {
         try {
            String requete = "DELETE FROM calendar WHERE id=?";
            PreparedStatement pst = cnx.prepareStatement(requete);
            pst.setInt(1, t.getId());
            pst.executeUpdate();
            System.out.println("rendez-vous supprimée !");

        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
    }

    @Override
    public List<calendar> afficher() {
         List<calendar> list = new ArrayList<>();

        try {
            String requete = "SELECT * FROM calendar";
            PreparedStatement pst = cnx.prepareStatement(requete);
            ResultSet rs = pst.executeQuery();
            while (rs.next()) {
                list.add(new calendar(rs.getInt("id"), rs.getString("title"), rs.getDate("start"), rs.getDate("end"), rs.getString("description"), rs.getString("background_color"), rs.getString("text_color"), rs.getString("border_color")));
            }

        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }

        return list;
    }
    
    public void modifier(calendar t) {
        try {
            String requete = "UPDATE calendar SET title=?,start=?,end=?,description=?,background_color=?,text_color=?,border_color=? WHERE id=?";
            PreparedStatement pst = cnx.prepareStatement(requete);
            pst.setInt(1, t.getId());
            pst.setString(2, t.getTitle());
            pst.setDate(3, t.getStart());
            pst.setDate(4, t.getEnd());
            pst.setString(5, t.getDescription());
            pst.setString(6, t.getBackground_color());
            pst.setString(7, t.getText_color());
            pst.setString(8, t.getBorder_color());
            pst.executeUpdate();
            System.out.println("rendez-vous modifiée !");

        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
    }
    
}
