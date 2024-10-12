<html>
    <head>
    <meta charset="utf-8"/>    
      <title>Formulaire d'ajout facture </title>
    </head>     
  <body>
         <h2 align="center" ><lebel class="label label-primary"> DETAILS DES FACTURES</lebel></h2>
	   <form method="POST" action="<?php echo site_url('Controllers_facture/ajouter'); ?>">
          <table border="0" align="center">
                 <tr>
          	         <td>** numero facture</td>
                 <td><input type="text" name="var_numeroFacture"></td>
	            </tr>
                  <tr>
          	        <td>* nom client</td>
                   <td><input type="text" name="var_nomClient_facture"></td>
	             </tr>
				 <td> reference facture</td>
                   <td><input type="text" name="var_referenceFacture"></td>
	             </tr>
               
			   <td>** date facture</td>
                   <td><input type="text" name="var_dateFacture"></td>
	             </tr>
				 <td>** montant facture</td>
                   <td><input type="text" name="var_montantFacture"></td>
	             </tr>
               
			   <td>total facture</td>
                   <td><input type="text" name="var_totalFacture"></td>
	             </tr>
                 <tr>
            <td></td>
            <td><input class="btn btn-info" type="submit" value="CONFIRMER"/> <input  class="btn btn-info" type="reset" value="VIDER"/></td>
           </tr>
           </table> 
    </form>
   </body>
 </html>