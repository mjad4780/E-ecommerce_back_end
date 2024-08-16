CREATE VIEW item1view AS 
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