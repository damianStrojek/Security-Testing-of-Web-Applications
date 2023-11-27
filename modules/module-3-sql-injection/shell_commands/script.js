function updateSQL() {
    var name = document.getElementById('uname').value;
    var password = document.getElementById('passwd').value;
    var query = "SELECT * FROM users WHERE login = '" + name + "' AND password = '" + password + "'";
    var output_sql_1 = document.getElementById('sql_1');
    output_sql_1.innerHTML = query;
}