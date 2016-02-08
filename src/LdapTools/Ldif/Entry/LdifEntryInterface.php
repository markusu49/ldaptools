<?php
/**
 * This file is part of the LdapTools package.
 *
 * (c) Chad Sikorra <Chad.Sikorra@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LdapTools\Ldif\Entry;

use LdapTools\Connection\LdapControl;
use LdapTools\Factory\LdapObjectSchemaFactory;
use LdapTools\Operation\LdapOperationInterface;
use LdapTools\Schema\LdapObjectSchema;

/**
 * The interface for a LDIF entry.
 *
 * @author Chad Sikorra <Chad.Sikorra@gmail.com>
 */
interface LdifEntryInterface
{
    /**
     * Add an object to the directory.
     */
    const TYPE_ADD = 'add';

    /**
     * Delete an object from the directory.
     */
    const TYPE_DELETE = 'delete';

    /**
     * Modify an existing object in the directory.
     */
    const TYPE_MODIFY = 'modify';

    /**
     * Modify the RDN of an existing object in the directory.
     */
    const TYPE_MODRDN = 'modrdn';

    /**
     * Modify the DN of an existing object in the directory (ie. Move or rename it).
     */
    const TYPE_MODDN = 'moddn';

    /**
     * Add a comment to the entry.
     *
     * @param string $comment
     * @return $this
     */
    public function addComment($comment);

    /**
     * Get the comments for the entry.
     *
     * @return string[]
     */
    public function getComments();

    /**
     * Set the DN for the entry.
     *
     * @param string $dn
     * @return $this
     */
    public function setDn($dn);

    /**
     * Get the DN for the entry.
     *
     * @return string
     */
    public function getDn();

    /**
     * Add a control to the entry.
     *
     * @param LdapControl $control
     * @return $this
     */
    public function addControl(LdapControl $control);

    /**
     * Get the controls for the entry.
     *
     * @return LdapControl[]
     */
    public function getControls();

    /**
     * Set the LDAP object type this entry should represent. This is a string from the schema for the domain, such as
     * 'user', 'group', 'contact', etc. If this is not null then the schema definition is used when transforming the
     * entry to a string/operation.
     *
     * @param string $type
     * @return $this
     */
    public function setType($type);

    /**
     * Get the LDAP object type this entry represents. See 'setType()' for more information.
     *
     * @return string|null
     */
    public function getType();

    /**
     * Get the string representation of the LDIF entry.
     *
     * @return string
     */
    public function toString();

    /**
     * Get the LDAP operation represented by this LDIF entry.
     *
     * @return LdapOperationInterface
     */
    public function toOperation();
}
