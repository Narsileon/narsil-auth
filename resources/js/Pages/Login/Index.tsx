import { Button, Section, SectionContent, SectionFooter, SectionHeader, SectionTitle } from "@narsil-ui/Components";
import { Form, FormProvider, FormRenderer, useForm } from "@narsil-forms/Components";
import { Link } from "@inertiajs/react";
import { useTranslationsStore } from "@narsil-ui/Stores/translationStore";

interface Props {
	form: FormType & { nodes: FormNodeType[] };
	registerable: boolean;
	status: string;
}

const Index = ({ form, registerable = false, status }: Props) => {
	const { trans } = useTranslationsStore();

	const reactForm = useForm({
		form: form,
	});

	return (
		<FormProvider {...reactForm}>
			<Form route={route("login")}>
				<Section>
					<SectionHeader>
						<SectionTitle>{form.title}</SectionTitle>
					</SectionHeader>
					<SectionContent>
						<FormRenderer nodes={form.nodes} />

						{registerable ? (
							<div className='flex flex-wrap items-center gap-x-1'>
								<span>{trans("No account?")}</span>

								<Button
									size='link'
									type='button'
									variant='inline-link'
									asChild={true}
								>
									<Link href={route("register")}>{trans("Sign up")}</Link>
								</Button>
							</div>
						) : null}

						<div className='flex flex-wrap items-center gap-x-1'>
							<span>{trans("Forgot your password?")}</span>
							<Button
								size='link'
								type='button'
								variant='inline-link'
								asChild={true}
							>
								<Link href={route("password.request")}>{trans("Reset Password")}</Link>
							</Button>
						</div>

						{status ? <span className='text-positive font-medium'>{status}</span> : null}
					</SectionContent>
					<SectionFooter>
						<Button type='submit'>{trans("Sign in")}</Button>
					</SectionFooter>
				</Section>
			</Form>
		</FormProvider>
	);
};

export default Index;
