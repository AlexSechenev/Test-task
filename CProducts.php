<?php
	class CProducts
	{
		public $rows;
		private $link;
		
		private function connect(){
			$servername = "localhost";
			$username = "root";
			$password = "102000";
			$dbname = "DB";
			$this->link = new mysqli($servername, $username, $password, $dbname);
			if($this->link->connect_errno){
				echo("Connection error");
			}
		}	
			
		public function get_products($row_count){
			if(!is_numeric($row_count)) exit("row_count is not a number");
			$this->connect();
			$sql = 'SELECT ID, PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_ARTICLE, PRODUCT_QUANTITY,
				DATE_CREATE FROM Products WHERE Hide=0 ORDER BY DATE_CREATE DESC LIMIT '.$row_count.';';
			$result = $this->link->query($sql);
			if($result){
				$this->rows = $result->fetch_all(MYSQLI_ASSOC);
				$result->free_result();
				$this->link->close();
				RETURN $this->rows;
			}
			else {
				echo "SQL error";
				$this->link->close();
				RETURN null;
			}
		}
		
		public function print_table(){
			echo "<table id=table border=1px>";
			echo "<tr><th>ID товара</th><th>Название</th><th>Цена</th><th>Описание</th><th>Количество</th>
				<th>Дата создания</th></tr>";
			foreach ($this->rows as $row) {
				echo "<tr id=",$row['ID'],"><td>", $row['PRODUCT_ID'],"</td><td>",$row['PRODUCT_NAME'],"</td>
					<td>",$row['PRODUCT_PRICE'],"</td><td>",$row['PRODUCT_ARTICLE'],"</td>
					<td><div id=qcell",$row['ID'],">",$row['PRODUCT_QUANTITY'],"</div>
					<button class=button_minus>-</button><button class=button_plus>+</button>
					</td><td>",$row['DATE_CREATE'],"</td>", "<td><button class=button_hide>Скрыть</button>
					</td></tr>";
			}
			echo("</table>");
		}
		
		public function hide_row($id) {
			$this->connect();
			$sql = 'UPDATE Products SET Hide=1 WHERE ID='.$id;
			if ($this->link->query($sql)){
				$this->link->close();
			}
			else {
				echo "SQL error";
				$this->link->close();
			}
		}
		
		public function inc_quantity($id){
			$this->connect();
			$sql = 'UPDATE Products SET PRODUCT_QUANTITY=PRODUCT_QUANTITY+1 WHERE ID='.$id.';';
			if ($this->link->query($sql)){
				$this->link->close();
			}
			else {
				echo "SQL error";
				$this->link->close();
			}
		}
		
		public function dec_quantity($id){
			$this->connect();
			$sql = 'UPDATE Products SET PRODUCT_QUANTITY=PRODUCT_QUANTITY-1 WHERE ID='.$id.';';
			if ($this->link->query($sql)){
				$this->link->close();
			}
			else {
				echo "SQL error";
				$this->link->close();
			}
		}
		
		public function get_quantity($id) {
			$this->connect();
			$sql = 'SELECT PRODUCT_QUANTITY FROM Products WHERE ID='.$id.' LIMIT 1;';
			$result = $this->link->query($sql);
			if($result){
				$rows = $result->fetch_all(MYSQLI_ASSOC);
				$result->free_result();
				$this->link->close();
				echo $rows[0]['PRODUCT_QUANTITY'];
			}
			else {
				$this->link->close();
				echo "SQL error";
			}
		}
	}
?>