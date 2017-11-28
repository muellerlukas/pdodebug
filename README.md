# Debug-Classes for PDO

## Summary
Theses classes are wrappers for PHP PDO.   
They are intended for easier debugging queries and connections.  
This very first release just supports printing a ready-to-use query after creating a prepared statement.

## Usage
Of course you have to include the matching class. The name of the class is the original class-name extended by the string "Dbg".  
Example: The debug-version of *PDOStatement* is *PDOStatementDbg* and is located in the file *PDOStatementDbg.class.php*   

### PDOStatementDbg
If you want to use the debug-class in your existing PDO-connection you have to register the class:  
```php
$dbh = new PDO(...);  
$dbh->setAttribute(PDO::ATTR_STATEMENT_CLASS, ['PDOStatementDbg', [$dbh]]);
```
  
You can use the following methods:  


| Method | Description |  
| --- | --- |  
| `getQueryString()` | query for direct use |  
  
