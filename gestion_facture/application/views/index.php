<html>
<head>
   <meta charset="utf-8"/>
   <title>Premiere essaie en CodeIgniter</title>
   <script langage="javascript">
        function excel(){
			
			var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
            var textRange; var j=0;
            tab = document.getElementById('clips_table'); // id of table

            for(j = 0 ; j < tab.rows.length ; j++) 
            {     
                tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
                //tab_text=tab_text+"</tr>";
            }

            tab_text=tab_text+"</table>";
            tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
            tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
            tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE "); 

            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
            {
                txtArea1.document.open("txt/html","replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus(); 
                sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
            }  
            else                 //other browser not tested on IE 11
                sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

            return (sa);
		}
function selectElementContents(el) {
        var body = document.body, range, sel;
        if (document.createRange && window.getSelection) {
            range = document.createRange();
            sel = window.getSelection();
            sel.removeAllRanges();
            try {
                range.selectNodeContents(el);
                sel.addRange(range);
            } catch (e) {
                range.selectNode(document.getElementById(el));
                sel.addRange(range);
            }
        } else if (body.createTextRange) {
            range = body.createTextRange();
            range.moveToElementText(el);
            range.select();
        }
    }
	function generer(){
                var htmltable= document.getElementById('clips_table');
                var html = htmltable.outerterHTML;
                window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
		}
</script>
</head>
<body>
    <?php $this->load->view('ajouterFacture'); ?>
    <h2 align="center"></h2>
	<table id="clips_table" border="1" cellspacing="0" align="center">
        <thead>
		<tr>
            <th>>Numero d'ordre</th>
            <th>>numero facture</th>
            <th>>nom client</th>
            <th>>reference facture</th>
            <th>>date facture</th>
            <th>>montant facture</th>
            <th>>total facture</th>
			<th>>Actions</th>
		</tr>
        </thead>
		<tbody>
			<?php
				
			$i=1; /*  
					  English: Initialized compter if the admin add some stuff  and it's automatically ordered
					  Malagasy: compteur mi_bouclé an le ordre le rang raha araka ny ajout atao ny administrateur
					  English: table_delex will used for a varriable name
					  Malagasy: table_delex no varriable ampiasako, ka rah mahta table_delex mandhandeha anao de nom de varriable zay ie:azo soloina
							 _____________________________________
					  English: the function name will be a complete phrase which translated in french
					  Malagasy: ny nom ny fonction koa de phrase lava be izay nadika francais mba ho fantatra ny dikany sy ny asany
				 */
			foreach ($row as $table_delex) {

			 echo "<tr>
					  <td>$i</td> 	   <!-- <boucle d'ordre ny ajout rehetra -->
					  <td>$table_delex->numeroFacture</td>
					  <td>$table_delex->nomClient_facture</td>
					  <td>$table_delex->referenceFacture</td>
					  <td>$table_delex->dateFacture</td>
					  <td>$table_delex->montantFacture</td>
					  <td>$table_delex->totalFacture</td>
					  <td>
					  <a href='".site_url('Controllers_facture/supprimer_les_donnees_apartir_de_id/')."/$table_delex->numeroFacture'>>Supprimer</a>
							 
					  <a href='".site_url('Controllers_facture/recupperer_les_donnees_ds1_form/')."/$table_delex->numeroFacture'>>Modifier</a>
					  </td>
					  </tr>
				  ";
						  
				$i++; // end of boucle
					 //eto no mamarana an le boucle
					   }
			?> 
		</tbody>
	</table>
	<input type="button" value="Exporter" name="Exporter" onClick="excel();">
	<input type="button" value="Copier vers.." name="Copier" onClick="selectElementContents('clips_table');">
	<input type="button" value="Generer.." name="Copier" onClick="generer();">
	<a href="<?php echo base_url('index.php/Controllers_facture/imprimer_tout'); ?>"><input class="btn btn-info" type="submit" name="" value="Impression"></input></a> 
</body>
</html>