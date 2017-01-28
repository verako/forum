<?php 
$this->load->view('header');
echo '<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyA75_Io2wz28vSQMll7wwHo32tutbq9pRY&hl=en" async="" defer="defer" type="text/javascript"></script>';	
echo "<div class='row'>";
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
	echo "<div class='col-md-10'>";
		echo $map['js'];
		echo $map['html'];
	echo "</div>";
echo "</div>";

$this->load->view('footer');