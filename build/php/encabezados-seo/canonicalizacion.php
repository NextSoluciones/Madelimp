<?php
		
		if (strlen($com)==0){
		?>
<link rel="canonical" href="https://www.madelimp.com/inicio"/>				
			<?php	
		}		
		if ($pga>0){
			if ($tot==1){
				?>
<link rel="canonical" href="https://www.madelimp.com/1-<?=$com?>-1-1"/>				
			<?php
			}
			if ($tot==2){
				if ($act==4||$act==3){
					?>
<link rel="canonical" href="https://www.madelimp.com/2-<?=$com?>-4-2"/>				
			<?php
				}
				else
				{
					?>
<link rel="canonical" href="https://www.madelimp.com/1-<?=$com?>-1-2"/>				
			<?php
				}
			}
			if ($tot>2){
				if ($pag==1){
					?>
<link rel="canonical" href="https://www.madelimp.com/1-<?=$com?>-1-<?=$tot?>"/>				
			<?php
				}
				if ($pag==$tot){
					?>
<link rel="canonical" href="https://www.madelimp.com/<?=$tot?>-<?=$com?>-4-<?=$tot?>"/>				
			<?php
				}
				if (($pag>1)&&($pag<$tot)){
					$p=$pag+1;
					?>
<link rel="canonical" href="https://www.madelimp.com/<?=$p?>-<?=$com?>-2-<?=$tot?>"/>				
			<?php
				}
			}
		}
		else{
			if ($boolCategoria) {
				?>
<meta name="robots" content="nofollow" />				
			<?php
			}
		}
                ?>