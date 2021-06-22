<?php

class DM_PlanTemplate extends Pluf_Model
{

    /**
     * @brief مدل قالب پلن را بارگذاری می‌کند.
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        $this->_a['table'] = 'DM_plantemplate';
        $this->_a['model'] = 'DM_Plantemplate';
        $this->_model = 'DM_Plantemplate';
        $this->_a['cols'] = array(
            'id' => array(
                'type' => 'Sequence',
                'blank' => false,
                'editable' => false,
                'readable' => true
            ),
            'description' => array(
                'type' => 'Varchar',
                'blank' => false,
                'size' => 2500,
                'editable' => true,
                'readable' => true
            ),
            'label' => array(
                'type' => 'Varchar',
                'blank' => false,
                'size' => 250,
                'editable' => true,
                'readable' => true
            ),
            'period' => array(
                'type' => 'Integer',
                'blank' => false,
                'editable' => false,
                'readable' => true
            ),
            'max_count' => array(
                'type' => 'Integer',
                'blank' => false,
                'editable' => false,
                'readable' => true
            ),
            'max_volume' => array(
                'type' => 'Integer',
                'blank' => false,
                'editable' => false,
                'readable' => true
            ),
            'content_name' => array(
                'type' => 'Varchar',
                'blank' => false,
                'size' => 500,
                'editable' => true,
                'readable' => true
            ),
            'price' => array(
                'type' => 'Integer',
                'blank' => false,
                'editable' => false,
                'readable' => true
            ),
            'off' => array(
                'type' => 'Integer',
                'blank' => false,
                'editable' => true,
                'readable' => true
            )
        )
        // relations
        ;
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
}
