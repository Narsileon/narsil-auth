import { Button, Section, SectionContent, SectionFooter, SectionHeader, SectionTitle } from "@narsil-ui/Components";
import { Form, FormProvider, FormRenderer, useForm } from "@narsil-forms/Components";
import { Link } from "@inertiajs/react";
import { useTranslationsStore } from "@narsil-ui/Stores/translationStore";

interface Props {
	form: FormType;
}

const Index = ({ form }: Props) => {
	const { trans } = useTranslationsStore();

	const reactForm = useForm({
		form: form,
	});

	return (
		<FormProvider {...reactForm}>
			<Form route={route("register")}>
				<Section>
					<SectionHeader>
						<SectionTitle>{form.title}</SectionTitle>
					</SectionHeader>
					<SectionContent>
						<FormRenderer nodes={form.nodes} />

						<div className='flex flex-wrap items-center gap-x-1'>
							<span>{trans("Already have an account?")}</span>
							<Button
								size='link'
								type='button'
								variant='inline-link'
								asChild={true}
							>
								<Link href={route("login")}>{trans("Sign in")}</Link>
							</Button>
						</div>
					</SectionContent>
					<SectionFooter>
						<Button type='submit'>{trans("Sign up")}</Button>
					</SectionFooter>
				</Section>
			</Form>
		</FormProvider>
	);
};

export default Index;
