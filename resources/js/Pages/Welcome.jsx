// CarExpenses.js
import { useState } from 'react';
import Sidebar from './Sidebar';  // Zaimportuj Sidebar

export default function CarExpenses() {
    const cars = [
        { id: 1, name: 'BMW E46' },
        { id: 2, name: 'Mercedes S Klasa' },
    ];

    const expenses = [
        {
            id: 1,
            type: 'Paliwo',
            amount: '100,24 PLN',
            date: '20.12.2024',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
            image: '/placeholder.svg?height=40&width=40'
        },
        {
            id: 2,
            type: 'Mechanik',
            amount: '1000,00 PLN',
            date: '20.12.2024',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            image: '/placeholder.svg?height=40&width=40'
        },
        {
            id: 3,
            type: 'Inne',
            amount: '10,99 PLN',
            date: '20.12.2024',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            image: '/placeholder.svg?height=40&width=40'
        },
        {
            id: 4,
            type: 'Inne',
            amount: '50,00 PLN',
            date: '20.12.2024',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.',
            image: '/placeholder.svg?height=40&width=40'
        }
    ];

    const [selectedCar, setSelectedCar] = useState(cars[0]);

    return (
        <div className="flex h-screen bg-white">
            {/* Sidebar */}
            <Sidebar cars={cars} selectedCar={selectedCar} setSelectedCar={setSelectedCar} />  {/* Użycie Sidebar */}

            {/* Main Content */}
            <div className="flex-1 p-4">
                <div className="mb-4">
                    <button className="w-full bg-[#2ECC71] text-white p-4 rounded-lg flex items-center justify-center">
                        <span className="mr-2">+</span>
                        Dodaj nową płatność
                    </button>
                </div>
                <div className="space-y-4">
                    {expenses.map((expense) => (
                        <div key={expense.id} className="bg-white rounded-lg border border-gray-100">
                            <div className="p-4">
                                <div className="flex items-start justify-between mb-2">
                                    <div className="flex-1">
                                        <div className="flex items-center gap-4 mb-1">
                                            <span className="font-medium">{expense.type}</span>
                                            <span className="text-gray-500">{expense.amount}</span>
                                        </div>
                                        <p className="text-sm text-gray-500 leading-relaxed">
                                            {expense.description}
                                        </p>
                                    </div>
                                    <div className="flex gap-4">
                                        <button className="text-blue-500">Edytuj</button>
                                        <button className="text-red-500">Usuń</button>
                                    </div>
                                </div>
                                <div className="flex justify-between items-end">
                                    <span className="text-gray-500 text-sm">{expense.date}</span>
                                    <img
                                        src={expense.image}
                                        alt=""
                                        className="w-10 h-10 rounded object-cover"
                                    />
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    );
}
