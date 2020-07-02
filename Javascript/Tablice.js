
function createTable(){
	createTable = Function("");
	
	var content = document.getElementById('tablica2');	
	var table = document.createElement('table');
	var head = document.createElement('thead')
	var tableBody = document.createElement('tbody');
	var tekstdiv = document.getElementById('tekstdiv');
	var per = document.createElement('p')
	per.setAttribute('id', "p_text");
	var tekstp = document.createTextNode("Tabele można dodać tylko raz, dodawanie kolejnych tabel jest zablokowane." + " Tabela została utworzona pod spodem");
	per.appendChild(tekstp);
	tekstdiv.appendChild(per);
	
	
	for (var j = 0; j < 7; j++){
		
		var row = document.createElement('tr');
		row.setAttribute('id', j);
		var trow = document.createElement('th');
		trow.setAttribute('id', j + "h");
		
		
		for (var i = 0; i < 7; i++){
			
			var cell = document.createElement('td');
			cell.setAttribute('id', i + "c");
			var cellContent = document.createTextNode(j + " " + i);
			cell.appendChild(cellContent);
			row.appendChild(cell);
			var thContent = document.createTextNode(j + " ID");
		}
		head.appendChild(trow);
		tableBody.appendChild(row);
		trow.appendChild(thContent);
		
	}
	table.appendChild(head);
	table.appendChild(tableBody);
	content.appendChild(table);
	table.setAttribute('class','tblo table-bordered');

}
function deletetable() {
    var elem = document.getElementById("tablica2");
	elem.parentNode.removeChild(elem);
	
}

function deleteRows() {
    var tbl = document.getElementById('table'), 
        lastRow = tbl.rows.length - 1,             
        i;
    //usuwanie
    for (i = lastRow; i > 0; i--) {
        tbl.deleteRow(i);
    }
}
function deleteColumns() {
    var tbl = document.getElementById('table'), 
        lastCol = tbl.rows[0].cells.length - 1,   
        i, j;
    // usuwanie rows
    for (i = 0; i < tbl.rows.length; i++) {
        for (j = lastCol; j > 0; j--) {
            tbl.rows[i].deleteCell(j);
        }
    }
}
function appendColumn() {
    var tbl = document.getElementById('table'), // table reference
        i;
    // pętla dla każdego wiersza i komurki 
    for (i = 0; i < tbl.rows.length; i++) {
        createCell(tbl.rows[i].insertCell(tbl.rows[i].cells.length), i, 'col');
    }
}
function appendRow() {
    var tbl = document.getElementById('table'), 
        row = tbl.insertRow(tbl.rows.length),      
        i;
    // Dodawanie cells do nowego wiersza
    for (i = 0; i < tbl.rows[0].cells.length; i++) {
        createCell(row.insertCell(i), i, 'row');
    }
}
function createCell(cell, text, tekst, style) {
    var div = document.createElement('div'), // tworzenie elementu div
    txt = document.createTextNode(text); // utworzenie textnode
	tekst = document.createTextNode(tekst);
	
	div.appendChild(tekst);                    // podpięcie tekstu do diva
    div.setAttribute('class','cel', style);        // dodanie klasy 
    div.setAttribute('className','cel', style);    // dodanie klasy dla IE 
    cell.appendChild(div);                   // podpięcie diva do komurki tabeli
}