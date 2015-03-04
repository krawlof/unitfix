<div id="tresc">
	<table id="tabela">
		<tr>
			<td>Imię</td>
			<td>Nazwisko</td>
			<td>Data Urodzenia</td>
			<td>Data Zatrudnienia</td>
			<td>Kod pocztowy</td>
			<td>Miejscowość</td>
			<td>Ulica</td>
		</tr>
	<?php
		$query="SELECT * FROM pracownicy";
		$result=mysqli_query($link,$query) or trigger_error ("Zapytanie: $query\n<br /> Błąd MySQL: " .mysql_error());
		while ($row = mysqli_fetch_array($result,MYSQL_ASSOC))
		{
			echo "<tr>";
			echo "<td>".$row['imie']."</td>";
			echo "<td>".$row['nazwisko']."</td>";
			echo "<td>".$row['data-urodzenia']."</td>";
			echo "<td>".$row['data-zatrudnienia']."</td>";
			echo "<td>".$row['kod-pocztowy']."</td>";
			echo "<td>".$row['miejscowosc']."</td>";
			echo "<td>".$row['ulica']."</td>";
			echo "</tr>";
		}
	?>
	</table>
</div>