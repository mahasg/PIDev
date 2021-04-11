/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package services;

import models.cellule;
import utils.DataSource;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author Administrateur
 */
public class ServiceCellule implements IService<cellule>  {
    
        Connection cnx = DataSource.getInstance().getCnx();


    @Override
    public void ajouter(cellule t) {
    try {
            String requete = "INSERT INTO cellule (idCellule,dispo) VALUES (?,?)";
            PreparedStatement pst = cnx.prepareStatement(requete);
            pst.setString(1, t.getIdCellule());
            pst.setBoolean(2, t.isDispo());
            pst.executeUpdate();
            System.out.println("Cellule ajoutée !");

        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }   
    }

    @Override
    public void supprimer(cellule t) {
        try {
            String requete = "DELETE FROM cellule WHERE idCellule=?";
            PreparedStatement pst = cnx.prepareStatement(requete);
            pst.setString(1, t.getIdCellule());
            pst.executeUpdate();
            System.out.println("Celulle supprimée !");

        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
    }

    

    @Override
    public List<cellule> afficher() {
         List<cellule> list = new ArrayList<>();

        try {
            String requete = "SELECT * FROM cellule";
            PreparedStatement pst = cnx.prepareStatement(requete);
            ResultSet rs = pst.executeQuery();
            while (rs.next()) {
                list.add(new cellule(rs.getString("idCellule"), rs.getBoolean("dispo")));
            }

        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }

        return list;
    }

}
