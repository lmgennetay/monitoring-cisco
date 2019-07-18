<?php
//récupération des infos de l'appareil  
					
				$wIdApp=$appareilChoisi['id'];
				?><INPUT NAME=TNom value="<?php echo $wIdApp ?>" size=20 > <?php
				$wLibelleApp=$appareilChoisi['libelle'];
				?><INPUT NAME=TNom value="<?php echo $wLibelleApp ?>" size=20 > <?php
				$wIpApp=$appareilChoisi['ip'];
				?><INPUT NAME=TNom value="<?php echo $wIpApp ?>" size=20 > <?php
				$wIdentifiantApp=$appareilChoisi['identifiant'];
				?><INPUT NAME=TNom value="<?php echo $wIdentifiantApp ?>" size=20 > <?php
				$wMdpApp=$appareilChoisi['motdepasse'];
				?><INPUT NAME=TNom value="<?php echo $wMdpApp ?>" size=20 > <?php
				$wMdp2App=$appareilChoisi['motdepasse2'];
				?><INPUT NAME=TNom value="<?php echo $wMdp2App ?>" size=20 > <?php
				
				//affichage mode "bismillah"
				//echo"<TR><TD colspan=2 ><H1> $wLibelleApp"."    "."$wIpApp"."    "."$wIdentifiantApp</H1></TD></TR>";				
				
			?>	