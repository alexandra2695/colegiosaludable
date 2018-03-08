<?php
function registraForo($titulo,$autor,$tema,$descrip,$urlImg){
		
		global $mysqli;
		
		$stmt = $mysqli->prepare("INSERT INTO registroforo (titulo,autor,tema,descrip,urlImg) VALUES(?,?,?,?,?)");
		$stmt->bind_param('sssss', $titulo,$autor,$tema,$descrip,$urlImg);
		
		if ($stmt->execute()){
			return $mysqli->insert_id;
			} else {
			return 0;	
		}		
	}

