<?php
/**
 * Created by PhpStorm.
 * User: hibro
 * Date: 01.11.15
 * Time: 21:54
 */

namespace Layer\Manager;


interface OrderInterface
{
    /** Add new order
     * @param $post
     * @return mixed
     */
    public function addOrder($post);


    /** Get order by ID
     * @param $id
     * @return mixed
     */
    public function getOrder($id);

    /** Delete order by ID
     * @param $post
     * @return mixed
     */
    public function delOrder($post);

    /** Last  $count orders
     * @param $count
     * @return mixed
     */
    public function lastOrders($count);

    /** Find orders by user/customer ID
     * @param $person_type
     * @param $id
     * @return mixed
     */
    public function findOrder ($person_type, $id);


}