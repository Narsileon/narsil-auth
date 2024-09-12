import { FormModel } from "@narsil-forms/Types";
import Form from "@narsil-forms/Components/Form/Form";
import FormProvider from "@narsil-forms/Components/Form/FormProvider";
import FormRenderer from "@narsil-forms/Components/Form/FormRenderer";
import useForm from "@narsil-forms/Components/Form/useForm";

export interface ChangePasswordFormProps {
	form: FormModel;
}

const ChangePasswordForm = ({ form }: ChangePasswordFormProps) => {
	const reactForm = useForm({
		form: form,
	});

	return (
		<FormProvider {...reactForm}>
			<Form
				method='patch'
				route={route("profile.password")}
			>
				<FormRenderer nodes={form.nodes} />
			</Form>
		</FormProvider>
	);
};

export default ChangePasswordForm;
