<?php

/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 09/01/17
 * Time: 23:24
 */
/**
 * @Entity
 * @Table(name="announces_announce")
 **/
class Announce
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $title;

    /**
     * @ManyToOne(targetEntity="TypeAnnounce", inversedBy="announces")
     * @JoinColumn(name="announces_type_id", referencedColumnName="id")
     */
    protected $type;

    /** @Column(type="string") **/
    protected $town;

    /** @Column(type="string") **/
    protected $postalCode;

    /** @Column(type="string", nullable=true) **/
    protected $duration;

    /** @Column(type="date", nullable=true) **/
    protected $date;


}