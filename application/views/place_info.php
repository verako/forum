<?php 
$this->load->view('header');
echo '<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyA75_Io2wz28vSQMll7wwHo32tutbq9pRY&hl=en" async="" defer="defer" type="text/javascript"></script>';	
echo "<div class='row'>";
	//Left column
	echo "<div class='col-md-2'>";
		echo '<ul>';
		foreach ($items as $i) {
			echo '<li>';
			$href=site_url("locations/showPlace/".$i['id']);
			echo '<a href="'.$href.'">'.$i['title'].'</a>';
			echo '</li>';
		}
		echo '</ul>';
	echo "</div>";

	//Right column
	echo "<div class='col-md-10'>";
		echo "<div class='row'>";
			echo "<div class='col-md-4'>";
				echo '<div style="color:green;font-size:20pt;">'.$item[0]['title'].'</div>';
				echo '<div style="background-colorcolor:lightblue;font-size:12pt;">'.
					$item[0]['info'].'</div>';
				echo '<div style="color:red;font-size:10pt;"> likes:'
					.$item[0]['ulike'].' dislikes:'.$item[0]['udislike'].'</div>';
			echo "</div>";
			echo "<div class='col-md-8'>";
				echo $map['js'];
				echo $map['html'];
			echo "</div>";
		echo "</div>";
	echo "</div>";
echo "</div>";
$this->load->view('footer');