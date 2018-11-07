<?php
	Class Order extends OrderCore{
		public static function generateReference(){
			$last_id = Db::getInstance()->getValue('
			SELECT MAX(id_order)
			FROM '._DB_PREFIX_.'orders');
			return str_pad((int)$last_id + 1, 9,' ', STR_PAD_LEFT);
		}
	}