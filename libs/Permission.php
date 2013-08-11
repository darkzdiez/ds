<?php

class Permission {

    public $_listKeyAccessKey;
    public $_group;
    public $_groupAccess;
    public $_elementFirs;
    public $_elementEnd;
    private $_count = 0;

    public function filterPrint($key, $return) {
        if ((!empty($this->_listKeyAccessKey) AND in_array($key, $this->_listKeyAccessKey)) OR (!empty($this->_group) AND !empty($this->_groupAccess) AND in_array($this->_groupAccess, $this->_group))) {
            $this->_count = $this->_count + 1;
            if ($this->_count == 1) {
                print $this->_elementFirs;
            }
            print $return;
        }
    }

    public function printEnd() {
        if ($this->_count != 0) {
            print $this->_elementEnd;
        }
    }

}