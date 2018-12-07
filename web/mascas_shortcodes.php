<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


class SocisShortcodes
{
    public static function subscriptionForm()
    {
        $form =  '
            <form name="mascas_subscribe_member">
                <p>
                <label for="mascas_member_name">' . __('Nom') . ':</label>
                <input type="text" name="mascas_member_name">
                </p><p>
                <label for="mascas_member_surnames">' . __('Cognoms') . ':</label>
                <input type="text" name="mascas_member_surnames">
                </p><p>
                <label for="mascas_member_document_number">' . __('NIF') . ':</label>
                <input type="text" name="mascas_member_document_number">
                </p><p>
                <label for="mascas_member_email">' . __('Correu electrònic') . ':</label>
                <input type="text" name="mascas_member_email">
                </p><p>
                <label for="mascas_member_phone">' . __('Telèfon') . ':</label>
                <input type="text" name="mascas_member_phone">
                </p><p>
                <label for="mascas_member_address">' . __('Adreça') . ':</label>
                <input type="text" name="mascas_member_address">
                </p><p>
                <label for="mascas_member_cp">' . __('Codi Postal') . ':</label>
                <input type="text" name="mascas_member_cp">
                </p><p>
                <label for="mascas_member_city">' . __('Municipi') . ':</label>
                <input type="text" name="mascas_member_city">
                </p><p>
                <label for="mascas_member_province">' . __('Provincia') . ':</label>
                <input type="text" name="mascas_member_province">
                </p><p>
                <p>
                <input id="mascas_actionSubscribe" type="button" value="' . __('Registrar-me com a soci') . '">
</p>
            </form>';

        return $form;

    }
}