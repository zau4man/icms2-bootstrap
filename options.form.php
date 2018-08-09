<?php

class formBootstrapTemplateOptions extends cmsForm {

    public function init() {

        return array(

            array(
                'type' => 'fieldset',
                'childs' => array(
                    new fieldImage('logo', array(
                        'title' => "Логотип",
                        'options' => array(
                            'sizes' => array('micro')
                        )
                    )),
                    new fieldString('logotext', array(
                        'title' => "Название сайта",
                        'options' => array(
                            'required'
                        )
                    )),
                )
            ),

        );

    }

}
