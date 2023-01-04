import { useEffect } from "react";
import GuestLayout from "@/Layouts/GuestLayout";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import { Head, Link, useForm } from "@inertiajs/inertia-react";
import axios from "axios";

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        address_1: '',
        address_2: '',
        city: '',
        state: '',
    });

    useEffect(() => {
        return () => {
            reset("password", "password_confirmation");
        };
    }, []);

    const onHandleChange = (event) => {
        setData(
            event.target.name,
            event.target.type === "checkbox"
                ? event.target.checked
                : event.target.value
        );
    };

    const submit = (e) => {
        e.preventDefault();

        post(route("register"));
    };

    const searchZipcode = (e) => {

        if ((e.target.value).length === 8) {

            axios.get(`/api/address/${e.target.value}`).then(response => {

                if (response.data === 'Address not found') return false;


                setData({...data, ...response.data})

                // for (let key in response.data) {

                //     if(key === 'address_1'){

                //         setData(key, response.data[key])
                //     }
                // }
            })
        }
    }
    console.log(data)
    return (
        <GuestLayout>
            <Head title="Register" />

            <form onSubmit={submit}>
                <div>
                    <InputLabel forInput="name" value="Name" />

                    <TextInput
                        id="name"
                        name="name"
                        value={data.name}
                        className="mt-1 block w-full"
                        autoComplete="name"
                        isFocused={true}
                        handleChange={onHandleChange}
                        required
                    />

                    <InputError message={errors.name} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel forInput="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        autoComplete="username"
                        handleChange={onHandleChange}
                        required
                    />

                    <InputError message={errors.email} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel forInput="zipcode" value="CEP" />
                    <TextInput
                        id="zipcode"
                        name="zipcode"
                        value={data.zipcode}
                        className="mt-1 block w-full"
                        autoComplete="zipcode"
                        isFocused={true}
                        handleChange={e => [searchZipcode(e), onHandleChange(e)]}
                        required
                        maxLength={8}
                    />
                    <InputError message={errors.zipcode} className="mt-2" />
                </div>

                <div className="grid grid-cols-3 gap-4">
                    <div className="mt-4 col-span-2">
                        <InputLabel forInput="address_1" value="Endereço" />
                        <TextInput
                            id="address_1"
                            name="address_1"
                            value={data.address_1}
                            className="mt-1 block w-full"
                            autoComplete="address_1"
                            isFocused={true}
                            required
                            handleChange={onHandleChange}
                        />
                        <InputError message={errors.address_1} className="mt-2" />
                    </div>
                    <div className="mt-4">
                        <InputLabel forInput="number" value="Nº" />
                        <TextInput
                            id="number"
                            name="number"
                            value={data.number}
                            className="mt-1 block w-full"
                            autoComplete="number"
                            isFocused={true}
                            handleChange={onHandleChange}
                            required
                        />
                        <InputError message={errors.number} className="mt-2" />
                    </div>
                </div>
                <div className="mt-4">
                    <InputLabel forInput="address_2" value="Bairro" />
                    <TextInput
                        id="address_2"
                        name="address_2"
                        value={data.address_2}
                        className="mt-1 block w-full"
                        autoComplete="address_2"
                        isFocused={true}
                        handleChange={onHandleChange}
                        required
                    />
                    <InputError message={errors.address_2} className="mt-2" />
                </div>
                <div className="grid grid-cols-3 gap-4">
                    <div className="mt-4">
                        <InputLabel forInput="number" value="Estado" />
                        <TextInput
                            id="state"
                            name="state"
                            value={data.state}
                            className="mt-1 block w-full"
                            autoComplete="state"
                            isFocused={true}
                            required
                            disabled
                        />
                        <InputError message={errors.state} className="mt-2" />
                    </div>
                    <div className="mt-4 col-span-2">
                        <InputLabel forInput="city" value="Cidade" />
                        <TextInput
                            id="city"
                            name="city"
                            value={data.city}
                            className="mt-1 block w-full"
                            autoComplete="city"
                            isFocused={true}
                            disabled
                            required
                        />
                        <InputError message={errors.city} className="mt-2" />
                    </div>

                </div>
                <div className="mt-4">
                    <InputLabel forInput="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        handleChange={onHandleChange}
                        required
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel
                        forInput="password_confirmation"
                        value="Confirm Password"
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="mt-1 block w-full"
                        handleChange={onHandleChange}
                        required
                    />

                    <InputError
                        message={errors.password_confirmation}
                        className="mt-2"
                    />
                </div>

                <div className="flex items-center justify-end mt-4">
                    <Link
                        href={route("login")}
                        className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Already registered?
                    </Link>

                    <PrimaryButton className="ml-4" processing={processing}>
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
}
