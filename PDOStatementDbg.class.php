<?php
class PDOStatementDbg extends PDOStatement 
{
	protected $_PDO = null;
	protected $_params = [];
	
	protected function __construct($PDO)
	{
		$this->_PDO = $PDO;
	}
	
	public function bindParam($paramno, &$param, $type = PDO::PARAM_STR, $maxlen = NULL, $driverdata = NULL)
	{	
		$this->_params[$paramno] = ['value' => $param, 'type' => $type, 'maxlen' => $maxlen];
		return parent::bindParam($paramno, $param, $type, $maxlen);
	}
	
	protected function replaceParamWithData($matches)
	{
		$param = $matches[0];
		if (!isset($this->_params[$param]))
		{
			throw new Exception('Parameter ' . $param . ' not set');
		}
		else
		{
			$paramd = $this->_params[$param];
			return $this->_PDO->quote($paramd['value'], $paramd['type']);
		}
	}
	public function getQueryString()
	{
		return preg_replace_callback('~:([a-z0-9]+)~i', [$this, 'replaceParamWithData'], $this->queryString);
	}
}