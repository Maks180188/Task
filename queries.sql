SELECT id, name
FROM goods
         INNER JOIN goods_tags ON goods.id = goods_tags.goods_id
         INNER JOIN tags ON tags.id = goods_tags.tag_id


SELECT DISTINCT department_id
FROM `evaluations`
WHERE gender = 1
  AND value > 5