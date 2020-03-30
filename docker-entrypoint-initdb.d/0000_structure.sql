use clean_architecture;
CREATE TABLE IF NOT EXISTS clean_architecture.sales
(
    id         BINARY(16) PRIMARY KEY,
    customerId BINARY(16),
    subtotal   DECIMAL(10, 2)
);
