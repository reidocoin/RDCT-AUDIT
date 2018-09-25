<?php

/**#@+
 * @version 0.0.1
 */

/**
 * @package L3
 * @version 0.1.0
 * @author Elquer <msn@elquer.com>
 * @copyright 2007 - 2014 (C) by Elquer
 * @license http://www.gnu.org/licenses/lgpl-3.0.txt GNU Lesser General Public License, Version 3
 */

/**
 * OTServ account abstraction.
 * 
 * @package L3
 * @version 0.1.0
 */
class L3_Fichas extends OTS_Row_DAO implements IteratorAggregate, Countable
{
/**
 * Fichas data.
 * 
 * @var array
 * @version 0.1.0
 */
    private $data = array(
						'id' => '', 
						'empresa' => '', 
						'nomefantasia' => '', 
						'endereco' => '', 
						'numero' => '', 
						'complemento' => '', 
						'cep' => '', 
						'bairro' => '', 
						'municipio' => '', 
						'estado' => '', 
						'cnpj' => '', 
						'cei' => '', 
						'filial' => '', 
						'telefone' => '', 
						'email' => '', 
						'site' => '', 
						'folha_pagamento' => '', 
						'contato' => '', 
						'funcionarios' => '', 
						'capital_social' => '', 
						'ini_atividades' => '', 
						'contador' => '', 
						'fone_contador' => '', 
						'situacao' => '', 
						'status' => '', 
						'posicao' => '', 
						'id_sind' => '', 
						'cad_data' => '', 
						'codigo' => '', 
						'cpf' => '', 
						'tipo_doc' => '', 
						'cnpj_branco' => '', 
						'user_id' => '', 
						'last_edit_dat' => '', 
						'last_edit_user' => '', 
						'op_simples' => '', 
						'data_simples' => '', 
						'cnae' => '', 
						'invalido' => '', 
						'id_sind_l' => '', 
						'telefone2' => '', 
						'telefone3' => '', 
						'cobuserid' => '', 
						'dat_imp' => '', 
						'resp_contador' => '', 
						'email_contador' => '', 
						'ultimoacionamento' => '', 
						'lotid' => ''
					);






	public function findEquipe($name)
    {
        // finds player's ID
        $id = $this->db->query('SELECT ' . $this->db->fieldName('id') . ' FROM ' . $this->db->tableName('equipe') . ' WHERE ' . $this->db->fieldName('equipe') . ' = ' . $this->db->quote($name) )->fetch();

        // if anything was found
        if( isset($id['id']) )
        {
            $this->load($id['id']);
        }
    }
/**
 * Loads account by it's e-mail address.
 * 
 * @version 0.1.5
 * @since 0.1.5
 * @param string $email Account's e-mail address.
 * @throws PDOException On PDO operation error.
 */
    public function findByEMail($email)
    {
        // finds player's ID
        $id = $this->db->query('SELECT ' . $this->db->fieldName('id') . ' FROM ' . $this->db->tableName('usuarios') . ' WHERE ' . $this->db->fieldName('email') . ' = ' . $this->db->quote($email) )->fetch();

        // if anything was found
        if( isset($id['id']) )
        {
            $this->load($id['id']);
        }
    }

/**
 * Checks if object is loaded.
 * 
 * @return bool Load state.
 */
    public function isLoaded()
    {
        return isset($this->data['id']);
    }

/**
 * Updates account in database.
 * 
 * <p>
 * Unlike other DAO objects account can't be saved without ID being set. It means that you can't just save unexisting account to automaticly create it. First you have to create record by using {@link OTS_Account::createName() createNamed() method}
 * </p>
 * 
 * <p>
 * Note: Since 0.0.3 version this method throws {@link E_OTS_NotLoaded E_OTS_NotLoaded exception} instead of triggering E_USER_WARNING.
 * </p>
 * 
 * @version 0.1.5
 * @throws E_OTS_NotLoaded If account doesn't have ID assigned.
 * @throws PDOException On PDO operation error.
 */
    public function save()
    {
        if( !isset($this->data['id']) )
        {
            throw new E_OTS_NotLoaded();
        }

        // UPDATE query on database
        $this->db->query('UPDATE ' . $this->db->tableName('usuarios') . ' SET ' . $this->db->fieldName('password') . ' = ' . $this->db->quote($this->data['password']) . ', ' . $this->db->fieldName('email') . ' = ' . $this->db->quote($this->data['email']) . ', ' . $this->db->fieldName('rlname') . ' = ' . $this->db->quote($this->data['rlname']) . ', ' . $this->db->fieldName('vip_time') . ' = ' . $this->db->quote($this->data['vip_time']) . ', ' . $this->db->fieldName('premium_points') . ' = ' . $this->db->quote($this->data['premium_points']) . ', ' . $this->db->fieldName('key') . ' = ' . $this->db->quote($this->data['key']) . ', ' . $this->db->fieldName('location') . ' = ' . $this->db->quote($this->data['location']) . ' WHERE ' . $this->db->fieldName('id') . ' = ' . $this->data['id']);
    }

/**
 * Account number.
 * 
 * <p>
 * Note: Since 0.0.3 version this method throws {@link E_OTS_NotLoaded E_OTS_NotLoaded} exception instead of triggering E_USER_WARNING.
 * </p>
 * 
 * @version 0.0.3
 * @return int Account number.
 * @throws E_OTS_NotLoaded If account is not loaded.
 */
    public function getId()
    {
        if( !isset($this->data['id']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['id'];
    }
	
/**
 * Other Account Information.
 * 
 * <p>
 * Note: Since 0.0.3 version this method throws {@link E_OTS_NotLoaded E_OTS_NotLoaded} exception instead of triggering E_USER_WARNING.
 * </p>
 * 
 * @version 0.0.3
 * @return int Account Information.
 * @throws E_OTS_NotLoaded If account is not loaded.
 */
 
	public function getRLName()
    {
        if( !isset($this->data['rlname']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['rlname'];
    }
	

       public function getPlayervip_time()
    {
        if( !isset($this->data['vip_time']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['vip_time'];
    }  

    public function getLocation()
    {
        if( !isset($this->data['location']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['location'];
    }
	
    public function getPageAccess()
    {
        if( !isset($this->data['acesso']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['acesso'];
    }
	
    public function getPremDays()
    {
        if( !isset($this->data['premdays']) || !isset($this->data['lastday']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['premdays'] - (date("z", time()) + (365 * (date("Y", time()) - date("Y", $this->data['lastday']))) - date("z", $this->data['lastday']));
    }
	
    public function getLastLogin()
    {
        if( !isset($this->data['lastday']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['lastday'];
    }
	
   

    public function getCreated()
    {
        if( !isset($this->data['created']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['created'];
    }

	public function getRecoveryKey()
    {
        if( !isset($this->data['key']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['key'];
    }
	public function getPremiumPoints()
    {
        if( !isset($this->data['premium_points']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['premium_points'];
    }

    public function setRLName($rlname)
    {
        $this->data['rlname'] = (string) $rlname;
    }
	
    public function setLocation($loc)
    {
        $this->data['location'] = (string) $loc;
    }
	



/**
 * Name.
 * 
 * @version 0.1.5
 * @since 0.1.5
 * @return string Name.
 * @throws E_OTS_NotLoaded If account is not loaded.
 */
    public function getName()
    {
        if( !isset($this->data['name']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['name'];
    }



/**
 * E-mail address.
 * 
 * <p>
 * Note: Since 0.0.3 version this method throws {@link E_OTS_NotLoaded E_OTS_NotLoaded} exception instead of triggering E_USER_WARNING.
 * </p>
 * 
 * @version 0.0.3
 * @return string E-mail.
 * @throws E_OTS_NotLoaded If account is not loaded.
 */
    public function getEMail()
    {
        if( !isset($this->data['email']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['email'];
    }



/**
 * Checks if account is blocked.
 * 
 * <p>
 * Note: Since 0.0.3 version this method throws {@link E_OTS_NotLoaded E_OTS_NotLoaded} exception instead of triggering E_USER_WARNING.
 * </p>
 * 
 * @version 0.0.3
 * @return bool Blocked state.
 * @throws E_OTS_NotLoaded If account is not loaded.
 */
    public function isBlocked()
    {
        if( !isset($this->data['blocked']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['blocked'];
    }

/**
 * Unblocks account.
 * 
 * <p>
 * This method only updates object state. To save changes in database you need to use {@link OTS_Account::save() save() method} to flush changed to database.
 * </p>
 */
    public function unblock()
    {
        $this->data['blocked'] = false;
    }

/**
 * Blocks account.
 * 
 * <p>
 * This method only updates object state. To save changes in database you need to use {@link OTS_Account::save() save() method} to flush changed to database.
 * </p>
 */
    public function block()
    {
        $this->data['blocked'] = true;
    }

/**
 * Checks if account is deleted (by flag setting).
 * 
 * @version 0.1.5
 * @since 0.1.5
 * @return bool Flag state.
 * @throws E_OTS_NotLoaded If account is not loaded.
 */
    public function isDeleted()
    {
        if( !isset($this->data['deleted']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['blocked'];
    }

/**
 * Unsets account's deleted flag.
 * 
 * <p>
 * This method only updates object state. To save changes in database you need to use {@link OTS_Account::save() save() method} to flush changed to database.
 * </p>
 * 
 * @version 0.1.5
 * @since 0.1.5
 */
    public function unsetDeleted()
    {
        $this->data['deleted'] = false;
    }

/**
 * Deletes account (only by setting flag state, not physicly).
 * 
 * <p>
 * This method only updates object state. To save changes in database you need to use {@link OTS_Account::save() save() method} to flush changed to database.
 * </p>
 * 
 * @version 0.1.5
 * @since 0.1.5
 */
    public function setDeleted()
    {
        $this->data['deleted'] = true;
    }

/**
 * Checks if account is warned.
 * 
 * @version 0.1.5
 * @since 0.1.5
 * @return bool Flag state.
 * @throws E_OTS_NotLoaded If account is not loaded.
 */
    public function isWarned()
    {
        if( !isset($this->data['warned']) )
        {
            throw new E_OTS_NotLoaded();
        }

        return $this->data['warned'];
    }

/**
 * Unwarns account.
 * 
 * <p>
 * This method only updates object state. To save changes in database you need to use {@link OTS_Account::save() save() method} to flush changed to database.
 * </p>
 * 
 * @version 0.1.5
 * @since 0.1.5
 */
    public function unwarn()
    {
        $this->data['warned'] = false;
    }

/**
 * Warns account.
 * 
 * <p>
 * This method only updates object state. To save changes in database you need to use {@link OTS_Account::save() save() method} to flush changed to database.
 * </p>
 * 
 * @version 0.1.5
 * @since 0.1.5
 */
    public function warn()
    {
        $this->data['warned'] = true;
    }



/**
 * @version 0.0.4
 * @param int $pacc PACC days.
 * @deprecated 0.0.3 There is no more premdays field in accounts table.
 */
    public function setPACCDays($premdays)
    {
    }

/**
 * Reads custom field.
 * 
 * <p>
 * Reads field by it's name. Can read any field of given record that exists in database.
 * </p>
 * 
 * <p>
 * Note: You should use this method only for fields that are not provided in standard setters/getters (SVN fields). This method runs SQL query each time you call it so it highly overloads used resources.
 * </p>
 * 
 * @version 0.0.5
 * @since 0.0.3
 * @param string $field Field name.
 * @return string Field value.
 * @throws E_OTS_NotLoaded If account is not loaded.
 * @throws PDOException On PDO operation error.
 */
    public function getCustomField($field)
    {
        if( !isset($this->data['id']) )
        {
            throw new E_OTS_NotLoaded();
        }

        $value = $this->db->query('SELECT ' . $this->db->fieldName($field) . ' FROM ' . $this->db->tableName('usuarios') . ' WHERE ' . $this->db->fieldName('id') . ' = ' . $this->data['id'])->fetch();
        return $value[$field];
    }

/**
 * Writes custom field.
 * 
 * <p>
 * Write field by it's name. Can write any field of given record that exists in database.
 * </p>
 * 
 * <p>
 * Note: You should use this method only for fields that are not provided in standard setters/getters (SVN fields). This method runs SQL query each time you call it so it highly overloads used resources.
 * </p>
 * 
 * <p>
 * Note: Make sure that you pass $value argument of correct type. This method determinates whether to quote field name. It is safe - it makes you sure that no unproper queries that could lead to SQL injection will be executed, but it can make your code working wrong way. For example: $object->setCustomField('foo', '1'); will quote 1 as as string ('1') instead of passing it as a integer.
 * </p>
 * 
 * @version 0.0.5
 * @since 0.0.3
 * @param string $field Field name.
 * @param mixed $value Field value.
 * @throws E_OTS_NotLoaded If account is not loaded.
 * @throws PDOException On PDO operation error.
 */
    public function setCustomField($field, $value)
    {
        if( !isset($this->data['id']) )
        {
            throw new E_OTS_NotLoaded();
        }

        // quotes value for SQL query
        if(!( is_int($value) || is_float($value) ))
        {
            $value = $this->db->quote($value);
        }

        $this->db->query('UPDATE ' . $this->db->tableName('usuarios') . ' SET ' . $this->db->fieldName($field) . ' = ' . $value . ' WHERE ' . $this->db->fieldName('id') . ' = ' . $this->data['id']);
    }



/**
 * Deletes account.
 * 
 * <p>
 * This method physicly deletes account from database! To set <i>deleted</i> flag use {@link OTS_Account::setDeleted() setDeleted() method}.
 * </p>
 * 
 * @version 0.0.5
 * @since 0.0.5
 * @throws E_OTS_NotLoaded If account is not loaded.
 * @throws PDOException On PDO operation error.
 */
    public function delete()
    {
        if( !isset($this->data['id']) )
        {
            throw new E_OTS_NotLoaded();
        }

        // deletes row from database
        $this->db->query('DELETE FROM ' . $this->db->tableName('usuarios') . ' WHERE ' . $this->db->fieldName('id') . ' = ' . $this->data['id']);

        // resets object handle
        unset($this->data['id']);
    }


/**
 * Returns number of player within.
 * 
 * @version 0.0.5
 * @since 0.0.5
 * @throws E_OTS_NotLoaded If account is not loaded.
 * @throws PDOException On PDO operation error.
 * @return int Count of players.
 */
    public function count()
    {
        return $this->getPlayersList()->count();
    }

/**
 * Magic PHP5 method.
 * 
 * @version 0.1.5
 * @since 0.1.0
 * @param string $name Property name.
 * @return mixed Property value.
 * @throws E_OTS_NotLoaded If account is not loaded.
 * @throws OutOfBoundsException For non-supported properties.
 * @throws PDOException On PDO operation error.
 */
    public function __get($name)
    {
        switch($name)
        {
            case 'id':
                return $this->getId();

            case 'name':
                return $this->getName();

            case 'password':
                return $this->getPassword();

            case 'eMail':
                return $this->getEMail();

            case 'premiumEnd':
                return $this->getPremiumEnd();

            case 'loaded':
                return $this->isLoaded();

            case 'playersList':
                return $this->getPlayersList();

            case 'blocked':
                return $this->isBlocked();

            case 'deleted':
                return $this->isDeleted();

            case 'warned':
                return $this->isWarned();

            case 'banned':
                return $this->isBanned();

            case 'access':
                return $this->getAccess();

            default:
                throw new OutOfBoundsException();
        }
    }

/**
 * Magic PHP5 method.
 * 
 * @version 0.1.5
 * @since 0.1.0
 * @param string $name Property name.
 * @param mixed $value Property value.
 * @throws E_OTS_NotLoaded If account is not loaded.
 * @throws OutOfBoundsException For non-supported properties.
 * @throws PDOException On PDO operation error.
 */
    public function __set($name, $value)
    {
        switch($name)
        {
            case 'name':
                $this->setName($name);
                break;

            case 'password':
                $this->setPassword($value);
                break;

            case 'eMail':
                $this->setEMail($value);
                break;

            case 'premiumEnd':
                $this->setPremiumEnd($value);
                break;

            case 'blocked':
                if($value)
                {
                    $this->block();
                }
                else
                {
                    $this->unblock();
                }
                break;

            case 'deleted':
                if($value)
                {
                    $this->setDeleted();
                }
                else
                {
                    $this->unsetDeleted();
                }
                break;

            case 'warned':
                if($value)
                {
                    $this->warn();
                }
                else
                {
                    $this->unwarn();
                }
                break;

            case 'banned':
                if($value)
                {
                    $this->ban();
                }
                else
                {
                    $this->unban();
                }
                break;

            default:
                throw new OutOfBoundsException();
        }
    }

/**
 * Returns string representation of object.
 * 
 * <p>
 * If any display driver is currently loaded then it uses it's method. Otherwise just returns account number.
 * </p>
 * 
 * @version 0.1.3
 * @since 0.1.0
 * @return string String representation of object.
 */
    public function __toString()
    {
        $ots = POT::getInstance();

        // checks if display driver is loaded
        if( $ots->isDisplayDriverLoaded() )
        {
            return $ots->getDisplayDriver()->displayAccount($this);
        }

        return $this->getId();
    }
}

/**#@-*/

?>