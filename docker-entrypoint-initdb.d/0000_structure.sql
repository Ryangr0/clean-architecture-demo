use clean_architecture;
CREATE TABLE IF NOT EXISTS clean_architecture.sales
(
    id          BINARY(36) PRIMARY KEY,
    customer_id BINARY(36),
    subtotal    DECIMAL(10, 2)
);
