ER

# users

    id
    name
    type (default user)
    family 
    mobile
    username
    password

#otp
    id
    tel
    code

# categories

    id    
    title
    slug
    image
    parent_id (nullable)

# brand

    id
    title   
    slug
    image   

--------------------------------------

# color

    id
    title
    code

# size

    id
    title

----------------------------------------

# products

    id
    category_id         (FK)(nullable)
    brand_id            (FK)(nullable)
    title
    slug
    price
    active              (boolean)
    on_sale             (nullable)
    on_sale_started_at  (nullable)
    on_sale_end_at      (nullable)
    image
    
    short_description   (nullable)
    long_description    (nullable)
    note                (nullable)
    stock

# product_details

    id
    product_id          (fk)
    title
    description

# product_galleries

    id
    product_id(fk)
    image

-----------------------------------------------

# color_product (pivot M:M)

    id
    color_id    (fk )
    product_id  (fk)

# product_size (pivot M:M)

    id
    product_id  (fk)
    size_id     (fk)

-----------------------------------------------

# up_sales

    id
    product_id  (fk)
    offer       (fk on products table)

# cross_sales

    id
    product_id  (fk)
    offer       (fk on products table)

# baskets

    id
    user_id     (fk)
    product_id  (fk)
    count

# cities

    id
    name

# states

    id
    city_id     (fk)
    name

# discounts

    id
    title
    percent
    image   (nullable)
    started_at
    end_at

# wishlists

    id
    user_id     (fk)
    product_id  (fk)

# comments

    id
    commentable_id
    commentable_type
    parent_id           (nullable)(fk on comments table)
    text
    show                (boolean)(default false)

# invoices

    id 
    user_id     (fk)
    product_id  (fk)
    discount_id (nullable)(fk on discounts table)
    count
    paid
    city_id     (fk)
    state_id    (fk)
    address
    postal_code
    tel
    note
    delivery_state [pending,shipping,deliverd]
    
