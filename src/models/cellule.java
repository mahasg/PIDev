/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package models;

/**
 *
 * @author Administrateur
 */
public class cellule {
   
    private String idCellule ;
    private boolean dispo ;

    public cellule(String idCellule, boolean dispo) {
        this.idCellule = idCellule;
        this.dispo = dispo;
    }

    public cellule(int aInt, String string, String string0) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    

    public String getIdCellule() {
        return idCellule;
    }

    public void setIdCellule(String idCellule) {
        this.idCellule = idCellule;
    }

    public boolean isDispo() {
        return dispo;
    }

    public void setDispo(boolean dispo) {
        this.dispo = dispo;
    }

    @Override
    public String toString() {
        return "cellule{" + "idCellule=" + idCellule + ", dispo=" + dispo + '}';
    }
    
    
    
}
