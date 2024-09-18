CREATE OR REPLACE VIEW item1view AS 
SELECT items.* ,categories.* FROM items
INNER JOIN categories on items.item_categories= categories.categories_id

//
SELECT item1view.* FROM item1view
INNER JOIN favorite ON favorite.favorite_itemsid =item1view.item_id AND favorite.favorite_userid=100

//
  وخلي قيمتها ب1favoriteالهدف منها  هاتلي كل العناصر الا مضافه في  
  وخلي قيمتها بي  0favoriteوهاتلي كل العناصر الا مش مضافه في 
SELECT item1view.*,1 AS favorite FROM item1view
INNER JOIN favorite ON favorite.favorite_itemsid =item1view.item_id AND favorite.favorite_userid=$userid
WHERE categories_id =$categoriesid
UNION ALL 
SELECT *,0 AS favorite FROM item1view
WHERE      categories_id =$categoriesid AND item_id NOT IN(SELECT item1view.item_id FROM item1view
INNER JOIN favorite ON favorite.favorite_itemsid =item1view.item_id AND favorite.favorite_userid=$userid)

//

//  لازم نكون بينهم علاقهitemsوجدول favoriteمهم جدا  سيضع كل عناصر بتاعت جدول
CREATE OR REPLACE VIEW myfavorite AS
// معني هذا السطر بينشا صفحه وهميه فيها الربط بين جدولين

SELECT favorite.* ,items.* ,user.user_id FROM favorite
INNER JOIN user ON user.user_id =favorite.favorite_userid
INNER JOIN items ON items.item_id =favorite.favorite_itemsid

//
CREATE OR REPLACE VIEW cartview AS
SELECT SUM(items.item_price) as items_prices  ,   COUNT(cart.cart_itemid)as countitems,   cart.*,items.* FROM cart 

INNER JOIN items ON items.item_id=cart.cart_itemid
GROUP BY cart.cart_itemid ,cart.cart_userid

/////
SELECT SUM(items_prices) as TotalPrice , COUNT(countitems)as Totalcount  FROM `cartview` 
 WHERE cartview.cart_userid=106 
GROUP BY cart_userid
/////////////
كيف تنشاColumn جديد
CREATE OR REPLACE VIEW cartview AS
SELECT SUM(items.item_price) as items_prices  ,  ( item_price  - ( item_price*item_discount/ 100)) AS itemprice_discount , COUNT(cart.cart_itemid)as countitems,   cart.*,items.* FROM cart 
INNER JOIN items ON items.item_id=cart.cart_itemid

WHERE cart_orders= 0
GROUP BY cart.cart_itemid ,cart.cart_userid,cart.cart_orders


INNER JOIN items ON items.item_id=cart.cart_itemid



CREATE OR REPLACE VIEW `item1view` AS
SELECT ( item_price  - ( item_price*item_discount/ 100)) AS itemprice_discount ,  items.* FROM items 

//كيف تنشاColumn جديد
//مع يعمل استدعاء لجميع categoriesوitemsو

CREATE OR REPLACE VIEW item1view AS 
SELECT items.* ,categories.*,item_price  - ( item_price*item_discount/ 100) AS itemprice_discount FROM items
INNER JOIN categories on items.item_categories= categories.categories_id

///////////
CREATE or REPLACE VIEW ordersview AS

SELECT   orders.*, adress.* FROM orders
INNER JOIN adress  ON adress.adress_id=  orders.orders_adress
////////////////////////
CREATE OR REPLACE VIEW ordersdetailasview AS
SELECT SUM(items.item_price) as items_prices  ,  ( item_price  - ( item_price*item_discount/ 100)) AS itemprice_discount , COUNT(cart.cart_itemid)as countitems,cart.*,items.*,ordersview.*   FROM cart    
INNER JOIN items ON items.item_id = cart.cart_itemid
INNER JOIN ordersview ON ordersview.orders_id=cart.cart_orders
WHERE cart_orders != 0
GROUP BY cart.cart_itemid ,cart.cart_userid,cart.cart_orders;

/////////////////////////////////itemtopselling
CREATE OR REPLACE VIEW itemtopselling AS
SELECT   ( item_price  - ( item_price*item_discount/ 100)) AS itemprice_discount , cart.*, items.* ,COUNT(cart_id) AS countorders FROM cart
INNER JOIN items ON items.item_id =cart.cart_itemid
WHERE cart_orders != 0
GROUP by cart_itemid ;
////////////////
CREATE OR REPLACE VIEW detailasaa AS 
SELECT items.* ,detailas.* FROM detailas 
INNER JOIN items ON items.item_id= detailas.item_deitalis;


//////////////////
SELECT `item_id`, `item_name`, `item_name_ar`, `item_decs`, `item_decs_ar`, `item_image`, `item_count`, `item_active`, `item_price`, `item_discount`, `item_data`, `item_categories`, `Size` FROM `items` 

JOIN size  ON items.item_id = size.id
        JOIN detailas  ON detailas.detailas_id = items.item_id
        
        GROUP BY items.item_id, i.item_name, i.item_description, s.size_color, s.size, img.image_url
        ////////////success///
        SELECT `item_id`, `item_name`, `item_name_ar`, `item_decs`, `item_decs_ar`, `item_image`, `item_count`, `item_active`, `item_price`, `item_discount`, `item_data`, `item_categories` FROM `items` 
JOIN size  ON items.item_id = size.id
        JOIN detailas  ON detailas.detailas_id = items.item_id
        GROUP BY items.item_id


        INNER JOIN items ON items.item_id= detailas.item_deitalis;

////////////////////////////////sunorders///////////////
SELECT  SUM(orders_status= 0) as TotalPending,    SUM(orders_status= 1) as TotalApprove , SUM(orders_status= 2) as TotalPrepare,SUM(orders_status= 3) as TotalShipped,SUM(orders_status= 4) as TotalDone ,SUM(orders_status= 5) as TotalCancel FROM `orders` WHERE 1
///////////////////////////////// item and favorite and home
SELECT items.*, categories.*,1 AS favorite ,( item_price - ( item_price*item_discount/ 100)) AS itemprice_discount FROM items
INNER JOIN favorite ON favorite.favorite_itemsid =items.item_id AND favorite.favorite_userid=104
INNER JOIN categories on items.item_categories= categories.categories_id 
UNION ALL 
SELECT *,0 AS favorite ,( item_price -( item_price*item_discount/ 100)) AS itemprice_discount  FROM items
INNER JOIN categories on items.item_categories= categories.categories_id 
WHERE  item_id NOT IN(SELECT items.item_id FROM items                                             
INNER JOIN favorite ON favorite.favorite_itemsid =items.item_id AND favorite.favorite_userid=104 )