## Debug-Classes for PDO

### Summary
Theses classes are wrappers for PHP PDO.   
They are intended for easier debugging queries and connections.  
This very first release just supports printing a ready-to-use query after creating a prepared statement.

### Usage
Of course you have to include the matching class. The name of the class is the original class-name extended by the string "Dbg".  
Example: The debug-version of _PDOStatement_ is _PDOStatementDbg_ and is located in the file _PDOStatementDbg.class.php_