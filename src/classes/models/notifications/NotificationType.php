<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 26/01/17
 * Time: 23:51
 */

namespace models\notifications;

use Visitor;

/**
 * @Entity
 * @Table(name="notification_type")
 **/
class NotificationType
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $label;

    public static function getRepo() {
        return Visitor::getEntityManager()->getRepository('models\notifications\NotificationType');
    }
}