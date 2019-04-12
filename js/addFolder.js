var i = 4;

function addFolder() {
	var name = document.getElementById("folderName").value
	if (name === "") {
		alert("Вы не ввели название")
	} else {
	var parent = document.getElementById("mainList");

	var li = document.createElement("li");
	li.className += "tree";

	var label = document.createElement("label");
	label.setAttribute('for', 'folder'+i);
	label.innerHTML = name;

	var input = document.createElement("input");
	input.setAttribute('type', 'checkbox');
	input.setAttribute('id', 'folder'+i);

	var ol = document.createElement("ol");

	var li2 = document.createElement("li");

	var a = document.createElement("a");
	a.innerHTML = "Добавить документ";
	a.setAttribute('href', '#');

	li2.appendChild(a);

	ol.appendChild(li2);

	li.appendChild(label);
	li.appendChild(input);
	li.appendChild(ol);
	
	parent.appendChild(li);
	i++;
	}
}
