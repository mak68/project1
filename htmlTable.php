<?php

class htmlTable extends page {
	public function get () {
	
	//Get the file name and open it
	$fileName = $_GET ['fileName'];
        $fileopen = fopen("//afs/cad/u/m/a/mak68/public_html/project1/uploads/".$fileName,"r+");
	
	//Generate HTML table
	$table = "<table>";
	while (($line = fgetcsv($fileopen)) !== false) {
                $table .= "<tr>";
		foreach ($line as $cell) {
		 $table .= "<td>" .htmlspecialchars($cell) . "</td>";
	}
                $table .= "</tr>\n";
	
	}
				//Close the file
				fclose($fileopen);
				$table .= "</table>";
				$this ->html .=$table;
				}
			}
