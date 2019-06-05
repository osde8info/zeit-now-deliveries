<?php

namespace App\Services\Subscription;

use App\Entities\Subscription;
use App\Entities\ScheduledOrder;

class GetScheduledOrders
{
    /**
     * scheduled orders
     *
     * @var array
     */
    
    protected $orders = [];
    
    /**
     * Handle generating the array of scheduled orders for the given number of weeks and subscription.
     *
     * @param \App\Entities\Subscription $subscription
     * @param int                        $forNumberOfWeeks
     *
     * @return array
     */
    public function handle(Subscription $subscription, $forNumberOfWeeks = 6)
    {
        //
        if ($subscription->getStatus() == 'Active') {
            $plan = $subscription->getPlan();
            $date = $subscription->getnextDeliveryDate();
            
            for ($i = 0; $i < $forNumberOfWeeks; $i++) {
                switch ($plan) {
                    case 'Weekly':
                        $interval =  true;
                        break;
    
                    case 'Fortnightly':
                        $interval = ($i % 2) == 0;
                        break;
                    
                    default:
                        break;
                }
                
                $order = new ScheduledOrder($date,$interval);
                $this->orders[] = $order;
                $date = $date->copy();
                $date->addWeek();
            }
        }
        return $this->orders;
    }
    
}