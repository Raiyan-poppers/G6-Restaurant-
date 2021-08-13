var Obj = {}
var prices = {}

function add(name, price) {
    if (name in Obj)
        Obj[name] += 1;
    else Obj[name] = 1;

    var stat = document.getElementById('status');

    stat.innerText = "Chosen item named " + name;
    stat.style.color = 'green';

    prices[name] = price;

    update_cart();
}

function remove(name)
{
    Obj[name]--;

    if(Obj[name] == 0)
    {
        delete Obj[name];
    }

    update_cart();
}

function update_cart() {
    var chosen = document.getElementById('chose').style.display = 'block';
    var table = document.getElementById('chose-table');

    table.innerHTML = "<tr><td>Name</td><td>Price</td><td>Quantity</td><td>Remove</td></tr>"

    var total_cost = 0;
    for (const name in Obj) {
        var tr = table.insertRow(-1); 
        var td = tr.insertCell(-1);
        td.innerText = name; // actual name of item

        td = tr.insertCell(-1);
        td.innerText = prices[name]; // price of name

        td = tr.insertCell(-1);
        td.innerText = Obj[name]; // quantity of name

        td = tr.insertCell(-1);
        td.innerHTML = `<span style="cursor: pointer; color:red" onclick="remove('${name}')">X</span>`;

        total_cost += prices[name] * Obj[name];
    }

    var tr = table.insertRow(-1);
    td = tr.insertCell(-1);
    td.innerText = 'Total';
    td = tr.insertCell(-1);
    
    td.innerText = "";

    td = tr.insertCell(-1);
    td.innerText = total_cost;
}