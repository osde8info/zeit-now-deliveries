# 
# Freddie's Flowers Backend Developer Test

Welcome to the Freddie's Flowers backend developer test!

When a user creates a subscription, they have a calendar on their online account where
they can see what deliveries they have coming up for the following 6 weeks. 
They have the ability to "untick" an upcoming delivery and mark it as a holiday, 
or "tick" an unticked upcoming delivery day for upcoming deliveries they have 
already created a holiday for.

Most customers are on a weekly subscription, however some customers are on fortnightly 
subscriptions. Fortnightly customers will have a delivery every other week by default,
so every other week will appear "unticked" on their calendar. However they can tick these deliveries
(also known as non-interval weeks) and choose to receive a one-off additional delivery
that they otherwise would not (also known as opt-in deliveries).

From the customer's point of view they see the next 6 weeks of their deliveries, 
along with a tick stating they are due a delivery, or no tick stating they 
aren't due a delivery.

##### Weekly customer account example
![weekly-customer](https://user-images.githubusercontent.com/11612604/58475093-ec13f180-8144-11e9-89a9-6899073e5efa.png)

##### Fortnightly customer account example
![fortnightly-customer](https://user-images.githubusercontent.com/11612604/58475264-63e21c00-8145-11e9-9035-891d541cf805.png)

In the database we have a table called `upcoming_deliveries` which has an entry for
each subscription's next 6 delivery days and whether it is part of the subscription's
normal interval, in addition to whether it is set as a holiday, or is set as an opt_in delivery.
For the purpose of this test we won't be using any storage or databases and will instead
do it all in-memory.

# The task
 - Fork this repository to your own GitHub account, create a new branch and do all
 your changes on this branch. When you are done please pull request your changes
 into master (**Without merging!**) so we can review the pull request.
 - You can create or add any additional tests you may require, but please do not 
 modify any of the existing tests as these should all ideally pass at the end of
 the exercise.
 - For the purpose of this exercise you should not be storing any data in a database
 or in storage, instead everything should be in memory using PHP.
 - Please do not delete any of the existing Entity & Service classes (or their methods),
 you may add additional methods, or change how existing methods work if needbe.
 
#### Getting started

- CD into the directory where you have cloned your fork of this repository and run `composer install`.
- Run `./vendor/bin/phpunit`. The tests will initially fail, your task is to write the code
that ensures they pass.
- Once complete, commit and push the result to a new branch. Pull request the branch and send
us the URL to review.
 
# The business rules
1) A subscription results in recurring deliveries. Each subscription has a specific
delivery day (e.g. Tuesday) so the deliveries will always be on this day.
2) A subscription can have plans. These include:
    - Weekly: Where the customer receives a delivery every week on the same day.
    - Fortnightly: Where the customer receives a delivery every other week on the 
    same day.
3) An active subscription should be able to forecast upcoming deliveries 
(ScheduleOrders, typically 6 weeks' worth) that the customer will be able to see 
on their account.
4) Both weekly & fortnightly customers have the ability to skip interval delivery days 
by setting them as holiday. This means the delivery is skipped and the customer
isn't charged.
5) Fortnightly customers also have the ability to opt-in to weeks they normally
wouldn't have a delivery if they like the arrangement that week. They can still
make holidays on their usual delivery days too.
6) A customer shouldn't be able to make a holiday on a date they normally don't 
have a delivery. Likewise they shouldn't be able to opt-in to an order if
it is their usual delivery interval.

# Tips
- In this project for dates we have decided to use the Carbon date library. You 
may find it useful to have a quick look at the documentation 
[here](https://carbon.nesbot.com/docs/).
- There are many different possible solutions and approaches to implement the 
required business rules here and make the tests pass. We are not looking a specific
solution but instead are more interested in your approach, how you've implemented 
your solution and how you structure & format your code.
- You should try to follow SOLID principles as a general guideline.
- All code **MUST** be formatted to 
[PSR-2 coding style guidelines](http://www.php-fig.org/psr/psr-2/)
- Please include docblocks for your methods and comment only where necessary.
- Please keep to using the Service pattern if you need to add any additional 
services.


