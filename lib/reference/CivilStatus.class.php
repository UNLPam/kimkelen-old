<?php 
/*
 * Kimkëlen - School Management Software
 * Copyright (C) 2013 CeSPI - UNLP <desarrollo@cespi.unlp.edu.ar>
 *
 * This file is part of Kimkëlen.
 *
 * Kimkëlen is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License v2.0 as published by
 * the Free Software Foundation.
 *
 * Kimkëlen is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Kimkëlen.  If not, see <http://www.gnu.org/licenses/gpl-2.0.html>.
 */ ?>
<?php

/**
 * Description of CivilStatus
 *
 * @author mansilla
 */
class CivilStatus extends BaseCustomOptionsHolder
{
    const CS_SINGLE   = 0;
    const CS_MARRIED  = 1;
    const CS_WIDOWER  = 2;
    const CS_DIVORCED = 3;

    protected $_options = array(
        self::CS_SINGLE   => 'Soltero',
        self::CS_MARRIED  => 'Casado',
        self::CS_WIDOWER  => 'Viudo',
        self::CS_DIVORCED => 'Divorciado'
    );
}