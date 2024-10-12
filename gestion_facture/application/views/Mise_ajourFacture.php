<html>
    <head>
      <title>FORMULAIRE</title>
    </head>
  <body>
       <h2 align="center">Mise a jour FACTURES</h2>
       <form method="POST" action="<?php echo site_url('Controllers_facture/metre_ajour_les_donnees'); ?>">
          <table border="0" align="center">
                 <tr>
          	         <td>** numero facture:</td>
                 <td><input type="text" name="var_numeroFacture" value="<?php echo $table_delex->numeroFacture?>"/></td>
	           </tr>
                  <tr>
          	        <td>* nom client:</td>
                   <td><input type="text" name="var_nomClient_facture"  value="<?php echo $table_delex->nomClient_facture;?>"/></td>
	             </tr>                     <tr>
          	         <td>reference facture:</td>
                 <td><input type="text" name="var_referenceFacture" value="<?php echo $table_delex->referenceFacture?>"/></td>
	           </tr>
                  <tr>
          	        <td>** date facture:</td>
                   <td><input type="text" name="var_dateFacture"  value="<?php echo $table_delex->dateFacture ?>"/></td>
	           </tr>                 <tr>
          	         <td>** montant facture:</td>
                 <td><input type="text" name="var_montantFacture" value="<?php echo $table_delex->montantFacture ?>"/></td>
	           </tr>
                  <tr>
          	        <td>total facture:</td>
                   <td><input type="text" name="var_totalFacture"  value="<?php echo $table_delex->totalFacture ?>"/></td>
	             </tr>
      
                       <tr>
                          <td></td>
                               <td><input type="submit" id="close" value="Metre ajour"/></td>
                      </tr>
           </table> 	
    </form>
   </body>
 </html>