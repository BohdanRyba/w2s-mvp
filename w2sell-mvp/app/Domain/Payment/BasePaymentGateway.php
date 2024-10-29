<?php
namespace App\Domain\Payment;

interface PaymentGatewayInterface
{
    /**
     * Ініціює платіж
     *
     * @param float $amount Сума платежу
     * @param string $currency Валюта платежу
     * @param array $metadata Додаткові дані платежу
     * @return string Ідентифікатор платежу
     */
    public function initiatePayment(float $amount, string $currency, array $metadata = []): string;

    /**
     * Перевіряє статус платежу
     *
     * @param string $paymentId Ідентифікатор платежу
     * @return string Статус платежу
     */
    public function checkPaymentStatus(string $paymentId): string;

    /**
     * Повертає кошти
     *
     * @param string $paymentId Ідентифікатор платежу
     * @param float|null $amount Сума повернення (якщо null, повертається вся сума)
     * @return bool Результат операції
     */
    public function refundPayment(string $paymentId, ?float $amount = null): bool;

    /**
     * Отримує інформацію про платіж
     *
     * @param string $paymentId Ідентифікатор платежу
     * @return array Інформація про платіж
     */
    public function getPaymentDetails(string $paymentId): array;

    /**
     * Створює клієнта в платіжній системі
     *
     * @param array $customerData Дані клієнта
     * @return string Ідентифікатор клієнта
     */
    public function createCustomer(array $customerData): string;

    /**
     * Зберігає платіжний метод для клієнта
     *
     * @param string $customerId Ідентифікатор клієнта
     * @param array $paymentMethodData Дані платіжного методу
     * @return string Ідентифікатор платіжного методу
     */
    public function savePaymentMethod(string $customerId, array $paymentMethodData): string;
}
