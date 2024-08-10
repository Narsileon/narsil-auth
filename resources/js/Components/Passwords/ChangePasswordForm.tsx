import { Form, FormProvider, FormRenderer, useForm } from "@narsil-forms/Components";

const ChangePasswordForm = ({ form }: ChangePasswordFormProps) => {
	const reactForm = useForm({
		form: form,
	});

	return (
		<FormProvider {...reactForm}>
			<Form
				method='patch'
				route={route("user-password.update")}
			>
				<FormRenderer nodes={form.nodes} />
			</Form>
		</FormProvider>
	);
};

export default ChangePasswordForm;
