function updateSQL() {
    var name = document.getElementById('uname').value;
    var password = document.getElementById('passwd').value;
    var query = "SELECT * FROM users WHERE login = '" + name + "' AND password = '" + password + "'";
    var output_sql_1 = document.getElementById('sql_1');
    output_sql_1.innerHTML = query;
}

function updateSQLRegister() {
    var name = document.getElementById('uname').value;
    var password = document.getElementById('passwd').value;
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;
    var query = "INSERT INTO users (login, password, first_name, last_name, total_money, total_loans) VALUES ('" + name + "', '" + password + "', '" + fname + "', '" + lname + "', 0, 0)";
    var output_sql_2 = document.getElementById('sql_2');
    output_sql_2.innerHTML = query;
}