<?php

namespace models\announces;

/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 09/01/17
 * Time: 23:26
 */
/**
 * @Entity
 * @Table(name="announces_type")
 **/
class TypeAnnounce
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $label;

    /**
     * @OneToMany(targetEntity="Announce", mappedBy="type")
     */
    protected $announces;

}