<?php

namespace App\Infrastructure\Services\Payment;

use App\Domain\Payment\PaymentGatewayInterface;

// Фабрика для створення платіжних шлюзів
interface PaymentGatewayFactoryInterface
{
    public function createPaymentGateway(string $gatewayType): PaymentGatewayInterface;
}

// Конкретна фабрика
class PaymentGatewayFactory implements PaymentGatewayFactoryInterface
{
    public function createPaymentGateway(string $gatewayType): PaymentGatewayInterface
    {
        switch ($gatewayType) {
            case 'liqpay':
                return new LiqPayAdapter();
            case 'stripe':
                return new StripeAdapter();
            case 'ipay':
                return new IPayAdapter();
            default:
                throw new \InvalidArgumentException("Непідтримуваний тип платіжного шлюзу: $gatewayType");
        }
    }
}

// Адаптери для кожного платіжного шлюзу
class LiqPayAdapter implements PaymentGatewayInterface
{
    // Реалізація методів інтерфейсу для LiqPay
    // ...
}

class StripeAdapter implements PaymentGatewayInterface
{
    // Реалізація методів інтерфейсу для Stripe
    // ...
}

class IPayAdapter implements PaymentGatewayInterface
{
    // Реалізація методів інтерфейсу для IPay
    // ...
}

// Стратегія вибору платіжного шлюзу
interface PaymentStrategyInterface
{
    public function selectGateway(array $paymentData): string;
}

class PaymentStrategy implements PaymentStrategyInterface
{
    public function selectGateway(array $paymentData): string
    {
        // Логіка вибору платіжного шлюзу на основі $paymentData
        // Повертає 'liqpay', 'stripe' або 'ipay'
    }
}

class PaymentServiceGateway implements PaymentGatewayInterface
{
    private PaymentGatewayFactoryInterface $gatewayFactory;
    private PaymentStrategyInterface $paymentStrategy;
    private PaymentGatewayInterface $currentGateway;

    public function __construct(
        PaymentGatewayFactoryInterface $gatewayFactory,
        PaymentStrategyInterface $paymentStrategy
    ) {
        $this->gatewayFactory = $gatewayFactory;
        $this->paymentStrategy = $paymentStrategy;
    }

    private function selectGateway(array $metadata): void
    {
        $gatewayType = $this->paymentStrategy->selectGateway($metadata);
        $this->currentGateway = $this->gatewayFactory->createPaymentGateway($gatewayType);
    }

    public function initiatePayment(float $amount, string $currency, array $metadata = []): string
    {
        $this->selectGateway($metadata);
        return $this->currentGateway->initiatePayment($amount, $currency, $metadata);
    }

    public function checkPaymentStatus(string $paymentId): string
    {
        // Припускаємо, що тип шлюзу можна визначити за $paymentId
        $this->selectGateway(['paymentId' => $paymentId]);
        return $this->currentGateway->checkPaymentStatus($paymentId);
    }

    public function refundPayment(string $paymentId, ?float $amount = null): bool
    {
        $this->selectGateway(['paymentId' => $paymentId]);
        return $this->currentGateway->refundPayment($paymentId, $amount);
    }

    public function getPaymentDetails(string $paymentId): array
    {
        $this->selectGateway(['paymentId' => $paymentId]);
        return $this->currentGateway->getPaymentDetails($paymentId);
    }

    public function createCustomer(array $customerData): string
    {
        $this->selectGateway($customerData);
        return $this->currentGateway->createCustomer($customerData);
    }

    public function savePaymentMethod(string $customerId, array $paymentMethodData): string
    {
        $this->selectGateway(['customerId' => $customerId] + $paymentMethodData);
        return $this->currentGateway->savePaymentMethod($customerId, $paymentMethodData);
    }
}
