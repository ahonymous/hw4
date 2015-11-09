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
    public function addRegisterOrder($post);


    /** Get order by ID
     * @param $id
     * @return mixed
     */
    public function getOrder($id);

    /** Delete order by ID
     * @param $post
     * @return mixed
     */
    public function delOrder($id);

    /** Last  $count orders
     * @param $count
     * @return mixed
     */
    public function lastOrders($count);



}