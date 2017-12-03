<?php

/**
 * CSV-persisted collection.
 * 
 * @author		JLP
 * @copyright           Copyright (c) 2010-2017, James L. Parry
 * ------------------------------------------------------------------------
 */
class XML_Model extends Memory_Model
{
//---------------------------------------------------------------------------
//  Housekeeping methods
//---------------------------------------------------------------------------

	/**
	 * Constructor.
	 * @param string $origin Filename of the CSV file
	 * @param string $keyfield  Name of the primary key field
	 * @param string $entity	Entity name meaningful to the persistence
	 */
	function __construct($origin = null, $keyfield = 'id', $entity = "stdClass")
	{
		parent::__construct();

		// guess at persistent name if not specified
		if ($origin == null)
			$this->_origin = get_class($this);
		else
			$this->_origin = $origin;

		// remember the other constructor fields
		$this->_keyfield = $keyfield;
		$this->_entity = $entity;

		// start with an empty collection
		$this->_data = array(); // an array of objects
		$this->fields = array(); // an array of strings
		// and populate the collection
        $this->load();
	}

	/**
	 * Load the collection state appropriately, depending on persistence choice.
	 * OVER-RIDE THIS METHOD in persistence choice implementations
	 */
	protected function load()
	{
		//---------------------
		if (($handle = simplexml_load_file($this->_origin)) !== FALSE)
		{
            // var_dump ($handle);

            $first = true;
            foreach ($handle -> children() as $xRecord) {
                $record = new $this -> _entity();
                foreach ($xRecord -> children() as $value) {
                    if ($first)
                    {
                        $this->_fields = array_keys((array)$xRecord);
                        $first = false;
                    }
                    $this->_fields;
                    $record -> {$value -> getName ()} = (string) $value;
                    $this -> _data[$record -> { $this ->_keyfield } ] = $record;
                }
            }
        }
        // Children, get dom element, get parent, kill me
		// --------------------
        // rebuild the keys table
		$this->reindex();
	}

	/**
	 * Store the collection state appropriately, depending on persistence choice.
	 * OVER-RIDE THIS METHOD in persistence choice implementations
	 */
	protected function store()
	{
		// rebuild the keys table
        $this->reindex();

        $rootName = $this->_entity . 's';


        $document = new SimpleXMLElement("<$rootName></$rootName>");;

		foreach ($this -> _data as $records) {
            $item = $document->addChild ($this->_entity);
			foreach (array_keys((array) $records) as $value) {
                $element = $item->addChild ($value, $records -> $value);
            }
            // Header('Content-type: text/xml');
            // var_dump ($document->asXML($this->_origin));
            // var_dump ($document);
            // var_dump ($document);
            $document->asXML($this->_origin);
        }
    }

}
