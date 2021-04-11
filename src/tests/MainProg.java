/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tests;

import java.util.Date;
import java.sql.SQLException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import models.calendar;
import models.reservation;
import services.ServiceCalendar;
import services.ServiceCellule;
import services.ServiceReservation;
import utils.DataSource;

/**
 *
 * @author aissa
 */
public class MainProg {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws SQLException {
        DataSource ds = DataSource.getInstance();
        java.util.Date utilDate = new java.util.Date();
        java.sql.Date sqlDate = new java.sql.Date(utilDate.getTime());
        ServiceCellule sc = new ServiceCellule();
        //test d'ajout cellule
        //sc.ajouter(new cellule("place28", true));
       // sc.afficher().forEach(System.out::println);
 
        
         //test de suppression cellule
       // sc.supprimer( new cellule("place28", true));
        //sc.afficher().forEach(System.out::println);
        
        ServiceReservation sr = new ServiceReservation();
       // sr.ajouter(new reservation(sqlDate, sqlDate , "tun1" , "place22"));
      //  sr.afficher().forEach(System.out::println);
        
        //test de suppression cellule
         //sr.supprimer( new reservation(63));
        // sr.afficher().forEach(System.out::println);
         
        sr.rechercherParDate("2021-03-12 18:04:00").forEach(System.out::println);
        // Diff("2021-03-12 18:04:00","2021-03-12 18:04:00");
         //sr.trie().forEach(System.out::println);
         
        ServiceCalendar cal = new ServiceCalendar();
        //cal.ajouter(new calendar(1,"hh",sqlDate ,sqlDate,"hh","gg","bb","cc"));
        //cal.afficher().forEach(System.out::println);

        //cal.supprimer( new calendar(1,"hh",sqlDate ,sqlDate,"hh","gg","bb","cc"));
        
        cal.modifier(new calendar(4,"hh",sqlDate ,sqlDate,"hh","gg","bb","cc"));
                cal.afficher().forEach(System.out::println);

        
    }


    
}
