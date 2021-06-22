<?php

class DM_Link extends Pluf_Model
{

    /**
     * @brief مدل داده‌ای را بارگذاری می‌کند.
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        $this->_a['table'] = 'DM_link';
        $this->_a['model'] = 'DM_Link';
        $this->_model = 'DM_Link';
        $this->_a['cols'] = array(
            'id' => array(
                'type' => 'Sequence',
                'blank' => false,
                'editable' => false,
                'readable' => true
            ),
            'secure_link' => array(
                'type' => 'Varchar',
                'blank' => false,
                'size' => 50,
                'editable' => false,
                'readable' => true
            ),
            'expiry' => array(
                'type' => 'Datetime',
                'blank' => false,
                'size' => 50,
                'editable' => false,
                'readable' => true
            ),
            'download' => array(
                'type' => 'Integer',
                'blank' => false,
                'size' => 50,
                'editable' => false,
                'readable' => true
            ),
            'creation_dtime' => array(
                'type' => 'Datetime',
                'blank' => true,
                'editable' => true,
                'readable' => true
            ),
            'modif_dtime' => array(
                'type' => 'Datetime',
                'blank' => true,
                'editable' => true,
                'readable' => true
            ),
            
            // relations
            'asset' => array(
                'type' => 'Foreignkey',
                'model' => 'DM_Asset',
                'blank' => false,
                'editable' => false,
                'readable' => true,
                'relate_name' => 'asset'
            ),
            'user' => array(
                'type' => 'Foreignkey',
                'model' => 'User',
                'blank' => false,
                'readable' => false,
                'editable' => false,
                'relate_name' => 'user'
            )
        );
        
        $this->_a['idx'] = array(
            'link_tenant_idx' => array(
                'col' => 'secure_link',
                'type' => 'unique', // normal, unique, fulltext, spatial
                'index_type' => '', // hash, btree
                'index_option' => '',
                'algorithm_option' => '',
                'lock_option' => ''
            )
        );
    }

    /**
     * \brief پیش ذخیره را انجام می‌دهد
     *
     * @param $create حالت
     *            ساخت یا به روز رسانی را تعیین می‌کند
     */
    function preSave($create = false)
    {
        if ($this->id == '') {
            $this->creation_dtime = gmdate('Y-m-d H:i:s');
        }
        $this->modif_dtime = gmdate('Y-m-d H:i:s');
    }

    /**
     * حالت کار ایجاد شده را به روز می‌کند
     *
     * @see Pluf_Model::postSave()
     */
    function postSave($create = false)
    {
        //
    }

    public static function getLinkBySecureId($secure_link)
    {
        $sql = new Pluf_SQL('secure_link=%s', $secure_link);
        return Pluf::factory('DM_Link')->getOne($sql->gen());
    }
}